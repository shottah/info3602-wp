export default class Search {
  constructor () {
    this.open = jQuery('.js-search-trigger');
    this.close = jQuery('.search-overlay__close');
    this.overlay = jQuery('.search-overlay');
    this.eventHandlers();
  }

  eventHandlers () {
    this.open.on('click', this.openOverlay.bind(this));
    this.close.on('click', this.closeOverlay.bind(this));
  }

  openOverlay () {
    this.overlay.addClass('search-overlay--active');
  }

  closeOverlay () {
    this.overlay.removeClass('search-overlay--active');
  }
};
