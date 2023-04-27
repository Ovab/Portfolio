<template>
    <section class="flex flex-col justify-center items-center h-max bg-gray-800 h-screen px-2 sm:mx-0">
        <h1 class="text-white text-9xl mb-10 underline underline-offset-8 decoration-8">Bavo Knol</h1>
        <typewriterSubHeadText/>
    </section>

    <section class="bg-gray-800 h-screen px-5">
        <h2 class="flex justify-center text-white text-7xl mb-10 underline-offset-8 decoration-8">Projects</h2>
        <projects :displayCorrectly="displayWorksCorrectly" data-type="projects"/>
    </section>

    <section class="bg-gray-800 h-screen px-5">
        <h2 class="flex justify-center text-white text-7xl mb-10 underline-offset-8 decoration-8">Software/IT Jobs</h2>
        <jobs :displayCorrectly="displayWorksCorrectly" data-type="jobs"/>
    </section>
</template>

<script>
export default {
    name: "index",
    data() {
        return {
            tags: [
                {
                    name: "Nuxt.js",
                    color: "#00c58e"
                },
                {
                    name: "TailwindCSS",
                    color: "#38b2ac"
                },
                {
                    name: "Larvel",
                    color: "#f56565"
                },
                {
                    name: "Node.js",
                    color: "#68d391"
                },
                {
                    name: "MongoDB",
                    color: "#067843"
                },
                {
                    name: "JavaScript",
                    color: "#f6e05e"
                },
                {
                    name: "Java",
                    color: "#d66d0f"
                },
                {
                    name: "Greenfoot",
                    color: "#93c75e"
                },
            ],
            inMove: false,
            inMoveDelay: 400,
            activeSection: 0,
            offsets: [],
            touchStartY: 0
        }
    },
    methods: {
        displayWorksCorrectly(works, sort = false) {
            // loop through the jobs and add the tags to the jobs
            works.forEach(job => {
                job.tags = this.matchProjectAndTags(job);
            })
            // sort the jobs
            if(sort) this.sortJobs(works);

            return works;
        },
        matchProjectAndTags(projectUpper) {
            // check if the tag of the project is in the tags array, if so add it to another array and return that array
            let matchedTags = [];
            if (projectUpper.tags === undefined) return matchedTags;
            projectUpper.tags.forEach(tag => {
                this.tags.forEach(tag2 => {
                    if (tag === tag2.name) {
                        matchedTags.push(tag2)
                    }
                })
            })
            return matchedTags;
        },
        sortJobs(works) {
            // sort the jobs by from and to date (if to date is null, it's still working there)
            works.sort((a, b) => {
                if (a.to === null) return -1;
                if (b.to === null) return 1;
                return new Date(b.to) - new Date(a.to);
            })

        },


        // scroll from https://codepen.io/WebDEasy/pen/NVOEBL
        /**
         * Calcaulates the absolute offsets of each section on the page and pushs it into the offsets array
         */
        calculateSectionOffsets() {
            let sections = document.getElementsByTagName('section');
            let length = sections.length;

            for (let i = 0; i < length; i++) {
                let sectionOffset = sections[i].offsetTop;
                this.offsets.push(sectionOffset);
            }
        },
        /**
         * Handle the 'mousewheel' event for other browsers
         */
        handleMouseWheel: function (e) {

            if (e.wheelDelta < 30 && !this.inMove) {
                this.moveUp();
            } else if (e.wheelDelta > 30 && !this.inMove) {
                this.moveDown();
            }

            e.preventDefault();
            return false;
        },
        /**
         * Handle the 'DOMMouseScroll' event for Firefox
         */
        handleMouseWheelDOM: function (e) {

            if (e.detail > 0 && !this.inMove) {
                this.moveUp();
            } else if (e.detail < 0 && !this.inMove) {
                this.moveDown();
            }

            return false;
        },
        /**
         * Move to the previous section or the last section if you're on the first section
         */
        moveDown() {
            this.inMove = true;
            this.activeSection--;

            if (this.activeSection < 0) this.activeSection = this.offsets.length - 1;

            this.scrollToSection(this.activeSection, true);
        },
        /**
         * Move to the next section or the first section if you're on the last section
         */
        moveUp() {
            this.inMove = true;
            this.activeSection++;

            if (this.activeSection > this.offsets.length - 1) this.activeSection = 0;

            this.scrollToSection(this.activeSection, true);
        },
        /**
         * Scrolls to the passed section id if the section exists and the delay is over
         */
        scrollToSection(id, force = false) {
            if (this.inMove && !force) return false;

            this.activeSection = id;
            this.inMove = true;

            // get section and scroll into view if it exists
            let section = document.getElementsByTagName('section')[id];
            if (section) {
                document.getElementsByTagName('section')[id].scrollIntoView({behavior: 'smooth'});
            }

            setTimeout(() => {
                this.inMove = false;
            }, this.inMoveDelay);

        },
        /**
         * Handles the 'touchstart' event on mobile devices
         */
        touchStart(e) {
            e.preventDefault();

            this.touchStartY = e.touches[0].clientY;
        },
        /**
         * Handles the 'touchmove' event on mobile devices
         */
        touchMove(e) {
            if (this.inMove) return false;
            e.preventDefault();

            const currentY = e.touches[0].clientY;

            if (this.touchStartY < currentY) {
                this.moveDown();
            } else {
                this.moveUp();
            }

            this.touchStartY = 0;
            return false;
        }
    },
    /**
     * mounted() hook executes after page load and call the section offset calculation and registers all events
     */
    mounted() {
        this.calculateSectionOffsets();

        window.addEventListener('DOMMouseScroll', this.handleMouseWheelDOM);  // Mozilla Firefox
        window.addEventListener('mousewheel', this.handleMouseWheel, {passive: false}); // Other browsers

        window.addEventListener('touchstart', this.touchStart, {passive: false}); // mobile devices
        window.addEventListener('touchmove', this.touchMove, {passive: false}); // mobile devices
    },
    /**
     * destroyed() hook executes on page destroy and removes all registered event listeners
     */
    destroyed() {
        window.removeEventListener('DOMMouseScroll', this.handleMouseWheelDOM); // Mozilla Firefox
        window.removeEventListener('mousewheel', this.handleMouseWheel, {passive: false});  // Other browsers

        window.removeEventListener('touchstart', this.touchStart); // mobile devices
        window.removeEventListener('touchmove', this.touchMove); // mobile devices
    }

}
</script>

<style scoped>
body {
    @apply bg-gray-800 h-screen m-0;
}

.textStrokeSmall {
    -webkit-text-stroke: 0.2px black
}

.textStroke {
    -webkit-text-stroke: 1.5px grey;
}
</style>
