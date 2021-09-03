<template>
    <div class="type-1">
        <div class="row">
            <div class="col-12">
                <div class="subheader">
                    <h1 class="h1-page">{{ page.title }}</h1>
                </div>

                <div class="page-detail-text" style="height: 80vh;">
                    
                    <div v-html="page.text"></div>

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