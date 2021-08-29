<template>
    <div class="type-7">

        <div class="row">
            <div class="col-12">
                <div class="subheader">
                    <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">{{ page.title }}</h1>
                </div>
                <div class="text" style="background: white; box-shadow: none; border: 0; overflow: hidden; width: auto; height: 88vh; padding: 4vh">
                    <iframe :src="'/lib/pdfjs/web/viewer.html?file=' + page.pdf" height="100%" width="100%" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                page: {},
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