<template>
    <div v-if="settings.orientation === 'vertical'">
        
        <div v-for="type in page.types" :key="type.id" class="container" style="position: relative; height: 100vh; background: transparent;">
            <div class="page-item">
                <KhramPageType1Vertical v-if="type.id == '1'" />
                <KhramPageType2Vertical v-if="type.id == '2'" />
                <KhramPageType3Vertical v-if="type.id == '3'" />
                <KhramPageType4Vertical v-if="type.id == '4'" />
                <KhramPageType5Vertical v-if="type.id == '5'" />
                <KhramPageType6Vertical v-if="type.id == '6'" />
                <KhramPageType7Vertical v-if="type.id == '7'" />
                <KhramPageType9Vertical v-if="type.id == '9'" />
                <KhramPageType10Vertical v-if="type.id == '10'" />
            </div>
        </div>

        <div class="subback">
            <router-link :to="{name: 'khram_Home'}">
                <i style="font-style: normal; color: #fff">←</i> Главная
            </router-link>
            <template v-if="page.parent_id">
                <template v-for="parent_page in pages">
                    <template v-if="parent_page.id == page.parent_id">
                        <router-link :to="{name: 'khram_PageItem', params: {id: parent_page.id}}" class="gal-button" style="margin-left: 1vh;">
                            <i style="font-style: normal; color: #fff">←</i> {{ parent_page.title }}
                        </router-link>
                    </template>
                </template>
            </template>
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