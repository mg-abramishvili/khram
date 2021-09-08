<template>
    <div v-if="settings.orientation === 'vertical'">
        
        <div v-for="type in page.types" :key="type.id" class="container" style="position: relative; background: transparent;">
            <div class="page-item">
                <KhramPageType1Vertical v-if="type.id == '1'" />
                <KhramPageType2Vertical v-if="type.id == '2'" ref="type2ref" />
                <KhramPageType3Vertical v-if="type.id == '3'" />
                <KhramPageType4Vertical v-if="type.id == '4'" ref="type4ref" />
                <KhramPageType5Vertical v-if="type.id == '5'" />
                <KhramPageType6Vertical v-if="type.id == '6'" ref="type6ref" />
                <KhramPageType7Vertical v-if="type.id == '7'" />
                <KhramPageType9Vertical v-if="type.id == '9'" />
                <KhramPageType10Vertical v-if="type.id == '10'" />
            </div>
        </div>

        <div class="footer">
            
            <template v-if="page.parent_id">
                <template v-for="parent_page in pages">
                    <template v-if="parent_page.id == page.parent_id">
                        <a @click="GoBack(parent_page.id)">
                            <i style="font-style: normal; color: #fff"><img src="/img/khram/back.svg"></i>
                        </a>
                    </template>
                </template>
            </template>

            <a @click="GoHome()">
                <img src="/img/khram/home.svg">
            </a>
        </div>
        

    </div>
</template>

<script>
    import KhramPageType1Vertical from '../pages/type-1/vertical'
    import KhramPageType2Vertical from '../pages/type-2/vertical'
    import KhramPageType3Vertical from '../pages/type-3/vertical'
    import KhramPageType4Vertical from '../pages/type-4/vertical'
    import KhramPageType5Vertical from '../pages/type-5/vertical'
    import KhramPageType6Vertical from '../pages/type-6/vertical'
    import KhramPageType7Vertical from '../pages/type-7/vertical'
    import KhramPageType9Vertical from '../pages/type-9/vertical'
    import KhramPageType10Vertical from '../pages/type-10/vertical'

    import { Hooper, Slide } from 'hooper';
    import 'hooper/dist/hooper.css';

    export default {
        data() {
            return {
                settings: {},
                page: {},
                pages: [],
            }
        },
        created() {
            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                });
            fetch(`/api/front/page/${this.$route.params.id}`)
                .then(response => response.json())
                .then(json => {
                    this.page = json;
                    if (json.parent_id !== null) {
                        fetch(`/api/front/page/${this.page.parent_id}`)
                            .then(response => response.json())
                            .then(json => {
                                this.parent_page = json.title;
                            });
                    }
                });
            fetch(`/api/front/pages_all/`)
                .then(response => response.json())
                .then(json => {
                    this.pages = json;
                });

            
        },
        methods: {
            GoBack(id) {
                if(this.page.types[0].id === 2) {
                    this.$refs.type2ref[0].slideToZero()
                }
                if(this.page.types[0].id === 4) {
                    this.$refs.type4ref[0].slideToZero()
                }
                if(this.page.types[0].id === 6) {
                    this.$refs.type6ref[0].slideToZero()
                }
                this.$router.push({name: 'khram_PageItem', params: {id: id}})
            },
            GoHome() {
                if(this.page.types[0].id === 2) {
                    this.$refs.type2ref[0].slideToZero()
                }
                if(this.page.types[0].id === 4) {
                    this.$refs.type4ref[0].slideToZero()
                }
                if(this.page.types[0].id === 6) {
                    this.$refs.type6ref[0].slideToZero()
                }
                this.$router.push({name: 'khram_Home'})
            },
        },
        components: {
            KhramPageType1Vertical,
            KhramPageType2Vertical,
            KhramPageType3Vertical,
            KhramPageType4Vertical,
            KhramPageType5Vertical,
            KhramPageType6Vertical,
            KhramPageType7Vertical,
            KhramPageType9Vertical,
            KhramPageType10Vertical
        }
    }
</script>