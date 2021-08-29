<template>
    <div class="type-2">
        <div class="subheader">
                    <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">{{ page.title }}</h1>
                </div>
                <div style="height: 88vh; background: white; padding: 4vh">
        <div class="row">
            <div class="col-5">
                <div v-if="page.image" class="page-detail-image" v-bind:style="{ 'background-image': 'url(' + page.image + ')' }"></div>
            </div>
            <div class="col-7">
                <div class="page-detail-text" style="height: 80vh; padding-left: 4vh">
                    <div v-html="page.text"></div>
                </div>
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