<template>
    <div class="text-white text-8xl mb-10">
        <h2 class="h-32" id="text">{{ texts[0] }}</h2>
    </div>
</template>

<script>
export default {
    name: "typewriterSubHeadText",
    data() {
        return {
            timeoutBetweenTexts: 2000,
            typeWriterSpeed: 80,
            keepLetters: 0,
            addedLetters: 0,
            iteration: 0,
            first: true,

            texts: [
                "Full-stack developer",
                "Web developer",
                "Full-time maker"
            ]
        }
    },

    methods: {
        removeText() {
            let text = document.getElementById("text");
            let textLength = text.innerHTML.length;

            if (textLength > this.keepLetters) {
                text.innerHTML = text.innerHTML.substring(0, textLength - 1);
                setTimeout(this.removeText, this.typeWriterSpeed);
            } else {
                setTimeout(this.addText, this.typeWriterSpeed);
            }
        },

        addText() {
            let text = document.getElementById("text");

            // if this is the first iteration, set the iteration to 1 because we already have the first text
            if (this.first) {
                this.iteration = 1;
                this.first = false;
            }

            if (this.addedLetters !== this.texts[this.iteration].length) {
                text.innerHTML += this.texts[this.iteration].substring(this.keepLetters + this.addedLetters, this.keepLetters + this.addedLetters + 1);
                this.addedLetters++;
                setTimeout(this.addText, this.typeWriterSpeed);
            } else {
                // reset the added letters, so we can add the next text
                this.addedLetters = 0;
                // increase the iteration to move on to the next text
                this.iteration++;

                // reset the iteration if we reach the end of the texts array
                if (this.iteration === this.texts.length) {
                    this.iteration = 0;
                }

                // reset the keepLetters (will set in a bit)
                this.keepLetters = 0;

                let nextText = this.texts[this.iteration];
                // Ternary Operator to avoid out of array error (go back to last key in array)
                let thisText = this.texts[this.iteration - 1 > 0 ? this.iteration - 1 : this.texts.length - 1];

                // set the keepLetters to the next text
                // check how many of the next letters are similar to the previous text
                for (let i = 0; i < nextText.length; i++) {
                    if (nextText.charAt(i) === thisText.charAt(i)) {
                        this.keepLetters++;
                    } else {
                        break;
                    }
                }

                setTimeout(this.removeText, this.timeoutBetweenTexts);
            }
        }
    },

    mounted() {
        setTimeout(this.removeText, this.timeoutBetweenTexts);
    }
}
</script>

<style scoped>

</style>