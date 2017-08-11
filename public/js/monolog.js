(function (context, parent) {

	/*
	 |--------------------------------------------------------------------------
	 | Private attributes
	 |--------------------------------------------------------------------------
	 */

	// DOM Elements
	var $monolog, $mainContainer, $subContainer;

	// Properties
	var interval;

	// Events
	var onOpening, onOpened, onClosing, onClosed, respectiveClose;

	/*
	 |--------------------------------------------------------------------------
	 | Constructor
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Monolog constructor.
	 *
	 * @constructor
	 * @access  public
	 * @param   {Array} params The list of params
	 * @author  Clément DOUIN clementdouin21@gmail.com
	 * @since   1.0.0
	 * @version 1.1.0
	 */
	var Monolog = function (params) {

		// If no params, leave
		if (! params) return;

		// Parse params
		var content = (params.content !== undefined ? params.content : '');
		var loader = (params.loader === true);
		onOpening = typeof params.onOpening === 'function' ? params.onOpening.bind(this) : emptyFunction;
		onOpened = typeof params.onOpened === 'function' ? params.onOpened.bind(this) : emptyFunction;
		onClosing = typeof params.onClosing === 'function' ? params.onClosing.bind(this) : emptyFunction;
		onClosed = typeof params.onClosed === 'function' ? params.onClosed.bind(this) : emptyFunction;

		// Create the sub container DOM Element
		$subContainer = parseElement('<div class="monolog-sub-container"></div>');
		$subContainer.innerHTML = (loader ? '<div class="monolog-loader"></div>' : content);

		// Create the main container DOM Element that contains the sub container
		$mainContainer = parseElement('<div class="monolog-main-container"></div>');
		$mainContainer.appendChild($subContainer);

		// Create the monolog DOM Element that contains the main container
		$monolog = parseElement('<div class="monolog"></div>');
		$monolog.appendChild($mainContainer);

		// Create close button if asked
		if (params.close !== false) {
			var $closeButton = parseElement('<div class="monolog-close">&times;</div>');
			$closeButton.addEventListener('click', this.close);
			$monolog.appendChild($closeButton);
		}

		// Set monolog opacity to 0 by default
		$monolog.style.opacity = 0;
	};

	/*
	 |--------------------------------------------------------------------------
	 | Private methods
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Empty function, used for initialisation.
	 *
	 * @access  private
	 * @author  Clément DOUIN clementdouin21@gmail.com
	 * @since   1.0.0
	 * @version 1.1.0
	 */
	function emptyFunction() {
		// Nothing to do here.
	}

	/**
	 * Parse HTML into DOM Element.
	 *
	 * @access  private
	 * @params  {string} html The HTML to parse into DOM Element
	 * @return  Element|string
	 * @author  Clément DOUIN clementdouin21@gmail.com
	 * @since   1.0.0
	 * @version 1.1.0
	 */
	function parseElement(html) {

		// If no html, leave
		if (typeof html !== 'string' || html.trim() === '') return '';

		// Create wrapper
		var wrapper = document.createElement('div');
		wrapper.innerHTML = html;

		// Return first child of the wrapper
		return wrapper.firstElementChild;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Public methods
	 |--------------------------------------------------------------------------
	 */

	/**
	 * Show Monolog with fade.
	 *
	 * @access  public
	 * @param   {number} time The fade time in ms
	 * @author  Clément DOUIN clementdouin21@gmail.com
	 * @since   1.0.0
	 * @version 1.1.0
	 */
	Monolog.prototype.show = function (time) {

		// If opacity > 0, leave
		if ($monolog.style.opacity > 0) return;

		// Call opening event
		onOpening();

		// Initialize time
		time = (time === undefined) ? 300 : time;

		// Set fade class and opacity to Monolog
		$monolog.setAttribute('class', 'monolog monolog-fade-in');
		$monolog.style.animationDuration = time + 'ms';
		$monolog.style.opacity = 1;

		// Add it to the parent
		parent.appendChild($monolog);

		// Set respective close method
		respectiveClose = this.hide.bind(this, time);

		// Throw event opened after delay
		setTimeout((function () {
			// Clear current interval
			clearInterval(interval);

			// Call opened event
			onOpened();
		}).bind(this), time);
	};

	/**
	 * Hide Monolog with fade.
	 *
	 * @access  public
	 * @param   {number} time The fade time in ms
	 * @author  Clément DOUIN clementdouin21@gmail.com
	 * @since   1.0.0
	 * @version 1.1.0
	 */
	Monolog.prototype.hide = function (time) {

		// If opacity < 1, leave
		if ($monolog.style.opacity < 1) return;

		// Call opening event
		onClosing();

		// Initialize time
		time = (time === undefined) ? 300 : time;

		// Set fade class and opacity to Monolog
		$monolog.setAttribute('class', 'monolog monolog-fade-out');
		$monolog.style.animationDuration = time + 'ms';
		$monolog.style.opacity = 0;

		// Throw event closed after delay
		setTimeout((function () {
			// Clear current interval
			clearInterval(interval);

			// Add it to the parent
			parent.removeChild($monolog);

			// Call opened event
			onClosed();
		}).bind(this), time);
	};

	/**
	 * Close Monolog with same fade that has been used for open it.
	 *
	 * @access  public
	 * @author  Clément DOUIN clementdouin21@gmail.com
	 * @since   1.0.0
	 * @version 1.1.0
	 */
	Monolog.prototype.close = function () {
		respectiveClose();
	};

	/**
	 * Set new content to Monolog.
	 *
	 * @access  public
	 * @param   {string} content The new content
	 * @author  Clément DOUIN clementdouin21@gmail.com
	 * @since   1.0.0
	 * @version 1.1.0
	 */
	Monolog.prototype.setContent = function (content) {
		$subContainer.innerHTML = String(content).trim();
	};

	// Add Monolog to context
	context.Monolog = Monolog.bind(undefined);

})(window, document.body);