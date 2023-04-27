<template>
    <div class="text-white text-3xl">
        Fancy git timeline or something is supposed to go here if I decide to work on this again
        <div class="grid grid-cols-auto grid-rows-2 gap-2 text-white" v-for="job in jobs">
            <WorksItem :work="job"/>
        </div>
    </div>
</template>

<script>
export default {
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
            jobs: [
                {
                    title: "Software Developer",
                    company: "Jaspers Media",
                    location: "The Netherlands",
                    description: "I started here as an intern and worked my way up to a full-time employee. " +
                        "I worked on of websites the <a class='underline' href='luier.nl'> Luier.nl </a>  and <a class='underline' href='flap.nl'>Flap.nl</a> as full stack developer. " +
                        "having had my hand in almost every bit of code on those websites",
                    tags: ['Nuxt.js', 'TailwindCSS', 'Node.js', 'MongoDB'],
                    github: null,
                    website: 'https://jaspersmedia.com/',
                    bgColor: "#353c4c",
                    from: "2020-01-01",
                    to: "2021-09-01"
                }
            ],
        }
    },
    computed: {
        jobs() {
            return this.displayCorrectly(this.jobs, true);
        },
    },
}
</script>

<style scoped>

</style>