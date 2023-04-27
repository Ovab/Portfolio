<template>
    <div class="grid grid-cols-1 grid-rows-2 lg:grid-cols-3 gap-2 text-white">
        <template v-for="project in jobs">
            <WorksItem :work="project"/>
        </template>
    </div>
</template>

<script>
export default {
    name: "Projects",
    props: {
        displayCorrectly: {
            type: Function,
            required: true
        },
        dataType: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            projects: [
                {
                    title: "This very website :)",
                    description: "I wanted a portfolio website that was easy to update while looking alright",
                    tags: ['Nuxt.js', 'TailwindCSS'],
                    github: 'Ovab/Portfolio',
                    website: null,
                    bgColor: "#2b3141"
                },
                {
                    title: "BK-Chess",
                    description: "This was a fun little chess game I made for game development at school but also a bit of a joke",
                    tags: ['Nuxt.js', 'TailwindCSS', 'JavaScript'],
                    github: "Ovab/BkChess",
                    website: 'https://chess.bavoknol.nl/',
                    bgColor: "#3e424a"
                },
                {
                    title: "The Bonding of Isaac",
                    description: "Small multi stage game I made in my first year for a week long Greenfoot completion at School where it won second place",
                    tags: ['Greenfoot', 'Java'],
                    github: "Ovab/GF-GAme",
                    website: null,
                    bgColor: "#34373e"
                },
                {
                    title: "Steam API project [WIP]",
                    description: "I'm currently working on a site that combines a bunch of data from the Steam API into a nice looking site",
                    tags: ['Nuxt.js', 'TailwindCSS', 'Node.js', 'MongoDB'],
                    github: null,
                    website: null,
                    bgColor: "#353c4c"
                },
            ],
        }
    },
    computed: {
        jobs() {
            return this.displayCorrectly(this.projects, true);
        },
    },
}
</script>

<style scoped>
/* Hide scrollbar for Chrome, Safari and Opera */
.noScrollbar::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.noScrollbar {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
}

</style>