(function(){
	/**
	 * Utilities
	 */
	let is_screen_sm = function() {
		if ( window.matchMedia("(max-width: 695px)").matches ) return 1;
		else return 0;
	}

	let get_message = function(text, type) {
		let message = document.createElement('div');

		message.classList.add('message');
		message.classList.add(type);
		message.setAttribute('role', 'alert');
		message.setAttribute('aria-live', 'assertive');
		message.setAttribute('tabindex', '-1');
		message.innerHTML = text;

		return message;
	}

	/**
	 * WP Rocket bypass request
	 * (for reading counters)
	 */
	var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

	request.open( 'GET', window.location + '?' + Date.now(), true );
	request.send();

	const is_fr = window.location.href.includes('/fr/');	
	
	/**
	 * Says hello to all the ninjas of the world.
	 */
	let cons_msg1 = 'Hello you ninja!';
	let cons_msg2 = 'If you have a question, contact me on Twitter';

	if ( is_fr ) {
		cons_msg1 = 'Salut ninja !';
		cons_msg2 = 'Si tu as des questions, contacte-moi sur Twitter';		
	}

	console.log(
		"%c" + cons_msg1 + " %c" + cons_msg2 + " %c@geoffreycrofte",
		"color:#A40162;font-size:32px;font-weight:bold;",
		"display:block;color:#999;font-size: 16px",
		"color:#A40162;font-size: 24px;"
	);

	/**
	 * 
	 * Replace next/prev links by a Button
	 * to call an XHR instead.
	 * 
	 */
	let posts_nav = document.querySelector('.posts-navigation');
	let is_page = window.location.href.match('https:\/\/geoffreycrofte.local\/[^\/]+\/page\/[0-9]+');
	let current_page = is_page === null ? null : is_page[0].split('/page/')[1];
	let get_next_page = function(next_page, callback) {
		let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		let current_url = window.location.href;
		let request_url = current_url.match('https:\/\/geoffreycrofte.local\/[^\/]+\/page\/[0-9]+') ? current_url.split('/page/')[0] + '/page/' + next_page : current_url + '/page/' + next_page;

		request.onreadystatechange = function() {
			if ( request.readyState === 4 ) {
				callback( request.response, next_page );
			}
		}

		request.onabort = request.onerror = function() {
			callback(false, {'requestedURL' : request_url, 'error': 'abort or error'});
		}

		try {
			request.open( 'GET', request_url , true );
			request.responseType = 'document';
			request.send();
		} catch (e) {
			e.requestedURL = request_url;
			callback(false, e);
		}
	};

	let cb_add_new_articles = function(xhr_response, next_page) {
		let more_button = document.getElementById('load-more');

		console.log(xhr_response, next_page);

		// If something went wrong.
		if ( xhr_response === false ) {
			let message = get_message( gct.errorOnMorePost, 'is-error' );

			// Remove existing message.
			if ( posts_nav.querySelector('.message') ) {
				posts_nav.querySelector('.message').remove();
			}

			// Display the message.
			posts_nav.append( message );
			posts_nav.querySelector('.message').focus();
			
			console.info( next_page.error ); // error message.

			// Push the URL of requested URL into the message.
			document.querySelector('.next-page-link').href = next_page.requestedURL;
			more_button.querySelector('svg').outerHTML = gct.iconBook;
			more_button.disabled = null;

			return;
		}

		let new_articles = xhr_response.querySelector('#primary .card-list');
		
		// New articles found.
		if ( new_articles ) {
			document.querySelector('#primary .navigation').before( new_articles );
		}

		// Check if there is more articles or if we need to replace the button.
		if ( xhr_response.querySelector('.posts-navigation .nav-previous') ) {
			more_button.dataset.page = next_page;
			more_button.querySelector('svg').outerHTML = gct.iconBook;
			more_button.disabled = null;
		} else {
			posts_nav.innerHTML = '<div class="message">' + gct.noMorePosts + '</div>';
		}
	};

	// Replace pagination with a load more button.
	// If we don't have a "nav-previous" already in the DOM, it's because we are at the last page of the archive.
	if ( posts_nav?.querySelector('.nav-previous') ) {
		current_page = current_page === null ? '1' : current_page;
		posts_nav.innerHTML = '<button type="button" class="button-primary is-light is-big" id="load-more" data-page="' + current_page + '">' + gct.iconBook + '<span>' + gct.loadMoreButtonLabel + '</<span></button>';

		let more_btn = document.getElementById('load-more');

		more_btn.addEventListener('click', function() {
			let current_page = this.dataset.page;
			// Change the icon and state.
			this.querySelector('svg').outerHTML = gct.iconLoader;
			this.disabled = 'disabled';
			// Fetch the next articles.
			get_next_page( parseInt(current_page) + 1, cb_add_new_articles );
		});
	} else {
		// Should I do something about it?
		// When people fall onto the last paginated content directly (weird TBH)
	}

	/**
	 * Comment form optimization.
	 */
	document.querySelector('.comment-form')?.removeAttribute('novalidate');

})();