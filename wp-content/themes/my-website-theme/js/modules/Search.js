export default class Search {
  constructor() {
    this.open = jQuery(".js-search-trigger");
    this.close = jQuery(".search-overlay__close");
    this.overlay = jQuery(".search-overlay");
    this.searchfield = jQuery("#search-term");
    this.searchresults = jQuery("#search-overlay__results");
    this.docbody = jQuery("body");
    this.overlayOpen = false;
    this.loading = false;
    this.eventHandlers();
  }

  eventHandlers() {
    this.open.on("click", this.openOverlay.bind(this));
    this.close.on("click", this.closeOverlay.bind(this));
    this.searchfield.on("keyup", this.typingLogic.bind(this));
    jQuery(document).on("keydown", this.keyPressDispatch.bind(this));
  }

  openOverlay() {
    this.overlay.addClass("search-overlay--active");
    this.docbody.addClass("body-no-scroll");
    this.overlayOpen = true;
    setTimeout(() => this.searchfield.focus(), 301);
  }

  closeOverlay() {
    this.overlay.removeClass("search-overlay--active");
    this.docbody.removeClass("body-no-scroll");
    this.overlayOpen = false;
  }

  keyPressDispatch(evt) {
    if (evt.keyCode == 83 && !this.overlayOpen) this.openOverlay();
    if (evt.keyCode == 27 && this.overlayOpen) this.closeOverlay();
  }

  typingLogic(evt) {
    if (this.searchfield.val() != this.previousval) {
      if (!this.loading) {
        this.searchresults.html(
          `<div class="spinner-loader">
          </div>`
        );
        this.loading = true;
      }
      this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
    } else {
      this.searchresults.html(
        `<div class="">
        </div>`
      );
      this.loading = false;
    }
    this.previousval = this.searchfield.val();
  }

  getResults() {
    if (!this.searchfield.val) return;
    if (!this.loading) return;

    const posttype = "posts";
    jQuery.getJSON(
      "/wp-json/wp/v2/" + posttype + "?search=" + this.searchfield.val(),
      (posts) => {
        this.searchresults.html(`
          <div>
            <h1 class="search-overlay__section-title">Search Results</h1>
            ${
              posts.length
                ? `<ul class="link-list min-list">
                ${posts
                  .map(
                    (post) =>
                      `<li><a href="${post.link}">${post.title.rendered}</a></li>`
                  )
                  .join("")}
                    </ul>`
                : `<p>No search results found</p>`
            }
          </div>
        `);
      }
    );

    this.loading = false;
  }
}
