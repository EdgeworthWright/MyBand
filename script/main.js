document.onkeyup = function(e) {
      if (e.altKey && e.which == 76) {
        if (window.confirm('Login to CMS?')) {
          window.open('/cms', '_blank');
        }
     }
};

const modal = {
  content: document.querySelectorAll('.modaalContent'),
  buttons: document.querySelectorAll('.modaalKnop'),

  makeBackground() {
    let background = document.createElement('div');
    background.classList.add('modaalAchtergrond');
    background.addEventListener('click', ()=>this.close());
    return background;
  },
  makeModal() {
    let modal = document.createElement('div');
    modal.classList.add('modaal');
    modal.addEventListener('click', (evt)=>evt.stopPropagation());
    return modal;
  },
  makeCloseButton() {
    let closeButton = document.createElement('div')
    closeButton.classList.add('sluitKnop');
    closeButton.innerHTML = '&#x00D7';
    closeButton.addEventListener('click', ()=>this.close());
    return closeButton;
  },
  open(elem) {
    this.background = this.makeBackground();
    this.closeButton = this.makeCloseButton();
    this.modal = this.makeModal();

    this.modal.appendChild(this.closeButton);
    this.modal.appendChild(elem);
    this.background.appendChild(this.modal);
    document.body.appendChild(this.background);
  },
  close() {
    this.modal.innerHTML = '';
    document.body.removeChild(this.background);
  }
};

for (let i = 0; i < modal.content.length; i++) {
  modal.content[i].parentNode.removeChild(modal.content[i]);
};

for (let i = 0; i < modal.buttons.length; i++) {
  modal.buttons[i].addEventListener('click', ()=>{
    let content = modal.content[i];
    modal.open(content);
  });
};
