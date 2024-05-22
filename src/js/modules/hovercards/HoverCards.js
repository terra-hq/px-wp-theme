class HoverCards {
    constructor(payload) {
      this.DOM = {
        cards: document.querySelectorAll(payload.cardSelector),
        activateBtnSelector: payload.activateBtnSelector,
        closeBtnSelector: payload.closeBtnSelector
      };
  
      if (!this.DOM.cards.length) return;
      this.init();
    }
  
    init() {
      

      this.DOM.cards.forEach(card => {
        const activateBtn = card.querySelector(this.DOM.activateBtnSelector);
        const closeBtn = card.querySelector(this.DOM.closeBtnSelector);

        this.isTouchDevice(activateBtn);
  
        if (activateBtn) {
          activateBtn.addEventListener('click', () => this.open(card));
        }
  
        if (closeBtn) {
          closeBtn.addEventListener('click', () => this.close(card));
        }

      card.addEventListener('mouseenter', () => this.open(card));
      card.addEventListener('mouseleave', () => this.close(card));
      
      });
    }  
    open(card) {
      card.classList.add('c--card-b--is-active');
    }  
    close(card) {
      card.classList.remove('c--card-b--is-active');
    }
    
    // Make activation button display none on non touch devices
    isTouchDevice(activateBtn) {
      const isTouchDevice = matchMedia("(pointer: coarse)").matches;
      if (!isTouchDevice) {
        activateBtn.style.display = 'none';
      }
    }
   
  }  
  
  export default HoverCards;
  