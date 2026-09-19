export default new class Text {
    set(text) {
        text = text || this.get();
        localStorage.text = text;
        text === 'small' ? document.documentElement.classList.add('small') : document.documentElement.classList.remove('small');
        text === 'medium' ? document.documentElement.classList.add('medium') : document.documentElement.classList.remove('medium');
        text === 'large' ? document.documentElement.classList.add('large') : document.documentElement.classList.remove('large');
    }
    get() {
        return localStorage.text;
    }
}
