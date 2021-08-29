<template>
    <div>
        <div class="container" style="position: relative; height: 100vh; background: transparent;">
        
        <div class="subheader">
            <h1 class="h1-page mb-4" style="font-weight: 400; text-transform: uppercase; font-size: 3.5vh; text-align: center; color: #C0C2B7; margin: 0; text-align: left;">План музея</h1>
        </div>
        <div style="background: white; padding: 2vh 4vh">
        <div class="row">
            <div class="col-12" style="order: 2">
                <div class="med-route-sidebar" style="margin-top: 8vh; padding: 2vh;">

                    <div class="row">
                        <div class="col-6">
                            <div v-if="search_panel" class="search_panel">
                                <input
                                :value="input"
                                class="input"
                                @input="onInputChange"
                                placeholder="Поиск..."
                                style="margin-bottom: 2vh;"
                                >
                                <SimpleKeyboard @onChange="onChange" @onKeyPress="onKeyPress" :input="input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <ul id="myUL" style="margin-top: 0.5vh;">
                                <li v-for="route in filtered_routes" :key="route.id" @click="SelectRoute(route)">
                                    <a>{{ route.title }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12" style="order: 1"> 
                <div class="route_about">
                
                    <template v-for="ra_cr in current_route.schemes">
                        <template v-if="ra_cr.id.toString() === current_floor">
                            {{ra_cr.title }}
                        </template>
                    </template>

                    <template v-if="current_route.schemes2">
                        <template v-for="ra_cr in current_route.schemes2">
                            <template v-if="ra_cr.id.toString() === current_floor">
                                {{ra_cr.title }}
                            </template>
                        </template>
                    </template>

                    <br>
                    {{current_route.title}}
                </div>

                <button v-if="current_slide === 2" @click="PrevScheme(current_route)" class="prevnextbutton prev_button">
                    Начало маршрута
                </button>
                <button v-if="current_route.schemes2 && current_route.schemes2.length > 0 && current_slide === 1" @click="NextScheme(current_route)" class="prevnextbutton next_button">
                    Продолжить маршрут
                </button>

                <div id="map" :class="[`${windowWidth > 1920 ? 'map4K':'map1080'}`]">
                    <div v-for="scheme in schemes" :key="scheme.id" :id="'scheme_image_' + scheme.id" class="scheme_images">
                        <img v-show="scheme.id.toString() === current_floor" :src="scheme.image" style="width:800px; height:450px;">
                    </div>

                    <svg v-if="current_slide === 1" class="map-path svg1" viewBox="0 0 800 450">
                        <path v-if="current_route.x_01" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_01 + ' ' + current_route.y_01 + ', '"></path>
                        <circle v-if="current_route.x_01" id="01" :cx="current_route.x_01" :cy="current_route.y_01" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_01" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_01' :y='current_route.y_01' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_begin }}</tspan></text>

                        <path v-if="current_route.x_02" class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_02 + ' ' + current_route.y_02 + ', ' + current_route.x_01 + ' ' + current_route.y_01"></path>
                        <circle v-if="current_route.x_02" id="02" :cx="current_route.x_02" :cy="current_route.y_02" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_02 && !current_route.x_03" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_02' :y='current_route.y_02' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_03" class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_03 + ' ' + current_route.y_03 + ', ' + current_route.x_02 + ' ' + current_route.y_02"></path>
                        <circle v-if="current_route.x_03" id="03" :cx="current_route.x_03" :cy="current_route.y_03" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_03 && !current_route.x_04" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_03' :y='current_route.y_03' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_04" class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_04 + ' ' + current_route.y_04 + ', ' + current_route.x_03 + ' ' + current_route.y_03"></path>
                        <circle v-if="current_route.x_04" id="04" :cx="current_route.x_04" :cy="current_route.y_04" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_04 && !current_route.x_05" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_04' :y='current_route.y_04' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_05" class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_05 + ' ' + current_route.y_05 + ', ' + current_route.x_04 + ' ' + current_route.y_04"></path>
                        <circle v-if="current_route.x_05" id="05" :cx="current_route.x_05" :cy="current_route.y_05" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_05 && !current_route.x_06" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_05' :y='current_route.y_05' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_06" class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_06 + ' ' + current_route.y_06 + ', ' + current_route.x_05 + ' ' + current_route.y_05"></path>
                        <circle v-if="current_route.x_06" id="06" :cx="current_route.x_06" :cy="current_route.y_06" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_06 && !current_route.x_07" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_06' :y='current_route.y_06' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_07" class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_07 + ' ' + current_route.y_07 + ', ' + current_route.x_06 + ' ' + current_route.y_06"></path>
                        <circle v-if="current_route.x_07" id="07" :cx="current_route.x_07" :cy="current_route.y_07" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_07 && !current_route.x_08" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_07' :y='current_route.y_07' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_08" class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_08 + ' ' + current_route.y_08 + ', ' + current_route.x_07 + ' ' + current_route.y_07"></path>
                        <circle v-if="current_route.x_08" id="08" :cx="current_route.x_08" :cy="current_route.y_08" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_08 && !current_route.x_09" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_08' :y='current_route.y_08' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_09" class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_09 + ' ' + current_route.y_09 + ', ' + current_route.x_08 + ' ' + current_route.y_08"></path>
                        <circle v-if="current_route.x_09" id="09" :cx="current_route.x_09" :cy="current_route.y_09" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_09 && !current_route.x_10" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_09' :y='current_route.y_09' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_10" class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_10 + ' ' + current_route.y_10 + ', ' + current_route.x_09 + ' ' + current_route.y_09"></path>
                        <circle v-if="current_route.x_10" id="10" :cx="current_route.x_10" :cy="current_route.y_10" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_10 && !current_route.x_11" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_10' :y='current_route.y_10' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_11" class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_11 + ' ' + current_route.y_11 + ', ' + current_route.x_10 + ' ' + current_route.y_10"></path>
                        <circle v-if="current_route.x_11" id="11" :cx="current_route.x_11" :cy="current_route.y_11" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_11 && !current_route.x_12" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_11' :y='current_route.y_11' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>

                        <path v-if="current_route.x_12" class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_12 + ' ' + current_route.y_12 + ', ' + current_route.x_11 + ' ' + current_route.y_11"></path>
                        <circle v-if="current_route.x_12" id="12" :cx="current_route.x_12" :cy="current_route.y_12" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_12" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_12' :y='current_route.y_12' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_1_end }}</tspan></text>
                    </svg>

                    <svg v-if="current_slide === 2" class="map-path svg2" viewBox="0 0 800 450">
                        <path v-if="current_route.x_101" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_101 + ' ' + current_route.y_101 + ', '"></path>
                        <circle v-if="current_route.x_101" id="01" :cx="current_route.x_101" :cy="current_route.y_101" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_101" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_101' :y='current_route.y_101' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_begin }}</tspan></text>

                        <path v-if="current_route.x_102" class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_102 + ' ' + current_route.y_102 + ', ' + current_route.x_101 + ' ' + current_route.y_101"></path>
                        <circle v-if="current_route.x_102" id="02" :cx="current_route.x_102" :cy="current_route.y_102" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_102 && !current_route.x_103" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_102' :y='current_route.y_102' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_103" class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_103 + ' ' + current_route.y_103 + ', ' + current_route.x_102 + ' ' + current_route.y_102"></path>
                        <circle v-if="current_route.x_103" id="03" :cx="current_route.x_103" :cy="current_route.y_103" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_103 && !current_route.x_104" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_103' :y='current_route.y_103' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_104" class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_104 + ' ' + current_route.y_104 + ', ' + current_route.x_103 + ' ' + current_route.y_103"></path>
                        <circle v-if="current_route.x_104" id="04" :cx="current_route.x_104" :cy="current_route.y_104" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_104 && !current_route.x_105" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_104' :y='current_route.y_104' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_105" class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_105 + ' ' + current_route.y_105 + ', ' + current_route.x_104 + ' ' + current_route.y_104"></path>
                        <circle v-if="current_route.x_105" id="05" :cx="current_route.x_105" :cy="current_route.y_105" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_105 && !current_route.x_106" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_105' :y='current_route.y_105' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_106" class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_106 + ' ' + current_route.y_106 + ', ' + current_route.x_105 + ' ' + current_route.y_105"></path>
                        <circle v-if="current_route.x_106" id="06" :cx="current_route.x_106" :cy="current_route.y_106" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_106 && !current_route.x_107" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_106' :y='current_route.y_106' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_107" class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_107 + ' ' + current_route.y_107 + ', ' + current_route.x_106 + ' ' + current_route.y_106"></path>
                        <circle v-if="current_route.x_107" id="07" :cx="current_route.x_107" :cy="current_route.y_107" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_107 && !current_route.x_108" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_107' :y='current_route.y_107' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_108" class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_108 + ' ' + current_route.y_108 + ', ' + current_route.x_107 + ' ' + current_route.y_107"></path>
                        <circle v-if="current_route.x_108" id="08" :cx="current_route.x_108" :cy="current_route.y_108" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_108 && !current_route.x_109" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_108' :y='current_route.y_108' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_109" class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_109 + ' ' + current_route.y_109 + ', ' + current_route.x_108 + ' ' + current_route.y_108"></path>
                        <circle v-if="current_route.x_109" id="09" :cx="current_route.x_109" :cy="current_route.y_109" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_109 && !current_route.x_110" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_109' :y='current_route.y_109' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_110" class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_110 + ' ' + current_route.y_110 + ', ' + current_route.x_109 + ' ' + current_route.y_109"></path>
                        <circle v-if="current_route.x_110" id="10" :cx="current_route.x_110" :cy="current_route.y_110" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_110 && !current_route.x_111" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_110' :y='current_route.y_110' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_111" class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_111 + ' ' + current_route.y_111 + ', ' + current_route.x_110 + ' ' + current_route.y_110"></path>
                        <circle v-if="current_route.x_111" id="11" :cx="current_route.x_111" :cy="current_route.y_111" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_111 && !current_route.x_112" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_111' :y='current_route.y_111' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>

                        <path v-if="current_route.x_112" class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_route.x_112 + ' ' + current_route.y_112 + ', ' + current_route.x_111 + ' ' + current_route.y_111"></path>
                        <circle v-if="current_route.x_112" id="12" :cx="current_route.x_112" :cy="current_route.y_112" r="7" fill="#f33"></circle>
                        <text v-if="current_route.x_112" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_route.x_112' :y='current_route.y_112' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_route.t_2_end }}</tspan></text>
                    </svg>
                </div>
            </div>
        </div>
        </div>
        </div>
<div class="subback">
            <router-link :to="{name: 'khram_Home'}">
                <i style="font-style: normal; color: #fff">←</i> Главная
            </router-link>
        </div>
    </div>
</template>

<script>
    import SimpleKeyboard from "../../khram/partials/SimpleKeyboard";

    export default {
        name: 'shkola_Routes',
        data() {
            return {
                settings: {},
                schemes: [],
                routes: {},
                
                current_slide: 1,
                current_floor: '1',
                current_route: {},

                search_panel: true,

                input: '',
                windowWidth: '',
            }
        },
        created() {
            this.windowWidth = window.screen.availWidth

            fetch(`/api/front/settings/`)
                .then(response => response.json())
                .then(json => {
                    this.settings = json;
                    
                });
            fetch(`/api/front/schemes`)
                .then(response => response.json())
                .then(json => {
                    this.schemes = json;
                });
            fetch(`/api/front/routes`)
                .then(response => response.json())
                .then(json => {
                    this.routes = json.data;
                });
        },
        computed: {
            filtered_routes: function () {
                if (this.input.trim() === '') {
                    return this.routes;
                } else {
                    return this.routes.filter(item => {
                    return item.title.toLowerCase().indexOf(this.input.toLowerCase()) >= 0;
                    });
                }
            },
        },
        mounted() {
            this.$watch(
            "$parent.reset_routes",
            (new_value, old_value) => {
                //console.log(old_value + '->' + new_value)
                if(old_value=== false && new_value === true) {
                    this.resetRoutes()
                }
            }
            );
        },
        methods: {
            SelectRoute(route) {
                this.$parent.reset_routes = false
                this.current_store_route = route.id
                this.current_floor = route.scheme_id
                fetch(`/api/front/route/${this.current_store_route}`)
                .then(response => response.json())
                .then(json => {
                    this.current_route = json;
                    this.current_slide = 1;
                });
            },
            PrevScheme(current_route) {
                this.current_floor = current_route.scheme_id
                this.current_slide = 1
            },
            NextScheme(current_route) {
                this.current_floor = current_route.scheme2_id
                this.current_slide = 2
            },
            onChange(input) {
                this.input = input;
            },
            onKeyPress(button) {
                //console.log("button", button);
            },
            onInputChange(input) {
                this.input = input.target.value;
            },

            search_panel_button() {
                this.search_panel = true;
            },
            search_panel_button_close() {
                this.search_panel = false;
            },
            resetRoutes() {
                this.current_slide = 1,
                this.current_floor = '1',
                this.current_route = {}
                this.input = ''
            }
        },
        components: {
            SimpleKeyboard,
        }
    }
</script>

<style scoped>
    .scheme_images {
        position: absolute;
        top: 0;
        left: 0;
    }

    .route_about {
        height: 10vh;
    }

    .prevnextbutton {
        position: absolute;
        bottom: 1vh;
    }

    .route_about {
        color: #333;
        text-align: center;
    }

    .input {
        width: 100%;
        padding: 0.5vh 2vh;
    }

    .map1080 {
        position: relative;
        width: 800px;
        height: 450px;
        transform: scale(1.1);
        transform-origin: 0 0;
        margin-top: -4vh;
        margin-bottom: -2vh;
        margin-left: 7vw;
    }

    .map4K {
        position: relative;
        width: 800px;
        height: 450px;
        transform: scale(2.3);
        transform-origin: 0 0;
        margin-top: -4vh;
        margin-bottom: 20vh;
        margin-left: 7vw;
    }

    #myUL {
        height: 26.5vh;
        padding-left: 2vh;
        margin-top: 0 !important;
    }

    .search_panel {
        width: 100%;
        padding: 0;
    }

    .prevnextbutton {
        background-color: #976545;
        color: #fff;
        font-size: 1.25vh;
        padding: 0.5vh 2vh;
        display: block;
        margin: 0 auto;
        width: 10vw;
        border-radius: 1vh;
        right: 2vw;
        border: 0;
        bottom: -5vh;
        z-index: 5;
    }

    .prevnextbutton:focus {
        outline: none;
    }

    #myUL li a {
        font-size: 1.5vh;
    }

    .search_button {
        position: absolute;
        top: 0;
        right: 0;
        background-color: rgba(255,255,255,0.5);
        border: 0;
        color: #222;
        padding: 1vh 2vh;
        font-size: 1.5vh;
        z-index: 10;
    }
</style>