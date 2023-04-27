<template>
    <div class="grid grid-cols-1 grid-rows-2 lg:grid-cols-3 gap-2 text-white"
         :class="{'grid-cols-2':projects.length >= 4}">
        <client-only>
            <template v-for="(project, index) in projects">
                <template v-if="index <= 4 && this.screenWidth <= 1024">
                    <div class="flex flex-col w-full px-2 rounded"
                         :style="{'background-color': project.bgColor}">
                        <div class="flex flex-col flex-1">
                            <div class="flex justify-center">
                                <h3 class="text-2xl">{{ project.title }}</h3>
                            </div>
                            <p class="mt-2">
                                {{ project.description }}
                            </p>
                        </div>
                        <div class="flex justify-between flex-col sm:flex-row"
                             :class="{'!flex-col':project.tags.length > 5}">
                            <div class="my-3 flex flex-row flex-wrap gap-2 noScrollbar">
                                <LanguageTag v-for="tag in matchProjectAndTags(project)" :tag="tag.name"
                                             :tag-color="tag.color"/>
                            </div>
                            <span class="flex flex-row gap-2 mb-2">
                        <nuxt-link v-if="project.github" :to="'https://github.com/'+project.github" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                 class="bi bi-github"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                            </svg>
                        </nuxt-link>
                        <nuxt-link v-if="project.website" :to="project.website" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                 class="bi bi-globe"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                            </svg>
                        </nuxt-link>
                    </span>
                        </div>
                    </div>
                </template>
            </template>
        </client-only>
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
            screenWidth: 0,
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
    mounted() {
        this.screenWidth = window.innerWidth;
    }
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