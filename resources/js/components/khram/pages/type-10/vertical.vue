<template>
    <div class="type-10">
        <div class="subheader">
            <h1 class="h1-page">{{ page.title }}</h1>
        </div>

         <iframe :src="page.iframe" frameborder="0" style="margin-left: -2vh; width: calc(100% + 4vh); height: 80vh; border-radius: 0.5vh; overflow: hidden;"></iframe>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                page: {},
                loading: true,
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                });
        },
        components: {
        }
    }
</script>