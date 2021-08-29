<template>
    <div class="type-10">
        <div class="subheader">
                    <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">{{ page.title }}</h1>
                </div>
        <div class="row">
            <div class="col-12">
                <!--<h1 class="h1-page">{{ page.title }}</h1>-->
                <iframe :src="page.iframe" frameborder="0" style="width: 100%; height: 88vh;"></iframe>
            </div>
        </div>
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