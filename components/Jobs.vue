<template>
    <div class="text-white text-3xl">
        Fancy git timeline or something is supposed to go here if I decide to work on this again
        <!-- loop though the sorted jobs        -->
        <div v-for="job in jobs">
            {{job}}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            jobs: [
                {
                    title: "Software Developer",
                    company: "Jaspers Media",
                    location: "The Netherlands",
                    description: "I'm currently working on a site that combines a bunch of data from the Steam API into a nice looking site",
                    tags: ['Nuxt.js', 'TailwindCSS', 'Node.js', 'MongoDB'],
                    github: null,
                    website: null,
                    from: "2020-01-01",
                    to: null
                },
                {
                    title: "Software Developer",
                    company: "Jaspers Media",
                    location: "The Netherlands",
                    description: "I'm currently working on a site that combines a bunch of data from the Steam API into a nice looking site",
                    tags: ['Nuxt.js', 'TailwindCSS', 'Node.js', 'MongoDB'],
                    github: null,
                    website: null,
                    from: "2020-02-01",
                    to: null
                }
            ],
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
        }
    },
    methods: {
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
        }
    }
}
</script>

<style scoped>

</style>