import elements from './elements.js';

export default {
    tam: 0,
    start() {
        elements.set.call(this);

        this.count.innerHTML = `Characters: ${this.tam}`;

        this.textInput.oninput = () => {
            this.tam = this.textInput.value.length;
            this.count.innerHTML = `Characters: ${this.tam}`;
        }      
    },
}