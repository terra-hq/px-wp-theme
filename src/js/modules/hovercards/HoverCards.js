import { u_addClass,u_removeClass,u_style,u_system } from '@andresclua/jsutil';


class HoverCards {
  constructor(payload) {
    
    this.DOM = {
      cards: document.querySelectorAll(payload.cardSelector),
      activateBtnSelector: payload.activateBtnSelector,
      closeBtnSelector: payload.closeBtnSelector
    };

    // If no cards are found, exit the constructor
    if (!this.DOM.cards.length) return;
    // this class does not have init because it only has event listeners
    this.events();
  }


  events() {
    // Iterate over each card element
    this.DOM.cards.forEach(card => {
      // Find the activate and close buttons within the current card
      const activateBtn = card.querySelector(this.DOM.activateBtnSelector);
      const closeBtn = card.querySelector(this.DOM.closeBtnSelector);

      // Adjust the activate button display for non-touch devices
      this.isTouchDevice(activateBtn);

      // Add click event listener to the activate button to open the card
      if (activateBtn) {
        activateBtn.addEventListener('click', () => this.open(card));
      }

      // Add click event listener to the close button to close the card
      if (closeBtn) {
        closeBtn.addEventListener('click', () => this.close(card));
      }

      // Add mouseenter event listener to the card to open/close it
      card.addEventListener('mouseenter', () => this.open(card));
      card.addEventListener('mouseleave', () => this.close(card));
    });
  }

  /**
   * Open the specified card by adding the active class.
   */
  open(card) {
    u_addClass(card, 'c--card-b--is-active');
  }

  /**
   * Close the specified card by removing the active class.
   */
  close(card) {
    u_removeClass(card, 'c--card-b--is-active');

  }

  /**
   * Adjust the display of the activate button for non-touch devices.
   */
  isTouchDevice(activateBtn) {

    // If not a touch device, hide the activate button
    if (!u_system('touch')) {
      u_style(activateBtn, [{ display: 'none' }]);
    }
  }
}

export default HoverCards;