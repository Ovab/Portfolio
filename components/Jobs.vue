<template>
    <div class="text-white text-3xl grid grid-cols-1 gap-2"
         :class="{'grid-cols-2':jobs.length === 2,
                    'grid-cols-3':jobs.length>= 3
        }">
        <div class="text-white" v-for="job in jobs">
            {{resolveDate(job.from)}} to {{resolveDate(job.to)}}
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
                    from: "2021-11-21",
                    to: null
                }
            ],
        }
    },
    computed: {
        jobs() {
            return this.displayCorrectly(this.jobs, true);
        },
    },
    methods: {
        // resolve date to words
        resolveDate(date) {
            if (date === null) {
                return "Present";
            }
            const d = new Date(date);
            return d.toLocaleString('default', {month: 'long'}) + " " + d.getFullYear();
        }
    }
}
</script>

<style scoped>

</style>