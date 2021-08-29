<template>
    <div class="type-9">
        
        <div class="row">
            <div class="col-12">
                <div class="subheader">
                    <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">{{ page.title }}</h1>
                </div>
                <div class="page-detail-text" style="height: 88vh; background: white; padding: 4vh">
                    <div class="excel-item" style="height: 100%;">
                        <xlsx-read :file="excel_file">
                            <xlsx-table />
                        </xlsx-read>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { XlsxRead, XlsxTable } from "vue-xlsx"

    export default {
        data() {
            return {
                page: {},
                file: null,
                excel_file: '',
            }
        },
        created() {
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    fetch(`${this.page.excel}`)
                        .then(response =>
                            response.blob()
                        )
                        .then(blob => {
                            this.excel_file = blob;
                        });
                });
        },
        components: {
            XlsxRead,
            XlsxTable
        }
    }
</script>