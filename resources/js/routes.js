// Храм
import khram_Home from './components/khram/home/vertical.vue';
import khram_PageItem from './components/khram/pages/PageItem';
import khram_Routes from './components/khram/routes/vertical';
import khram_Reviews from './components/khram/reviews/vertical';
import khram_Photoalbums from './components/khram/photoalbums/index-vertical';
import khram_PhotoalbumItem from './components/khram/photoalbums/show-vertical';
import khram_Videoalbums from './components/khram/videoalbums/index-vertical';
import khram_VideoalbumItem from './components/khram/videoalbums/show-vertical';
import khram_News from './components/khram/news/index-vertical';
import khram_NewsItem from './components/khram/news/show-vertical';

export const routes = [
    // Храм
    {
        path: '/vue-app/khram/index',
        name: 'khram_Home',
        component: khram_Home
    },
    {
        path: '/vue-app/khram/pages/:id',
        name: 'khram_PageItem',
        component: khram_PageItem
    },
    {
        path: '/vue-app/khram/routes',
        name: 'khram_Routes',
        component: khram_Routes,
    },
    {
        path: '/vue-app/khram/reviews',
        name: 'khram_Reviews',
        component: khram_Reviews
    },
    {
        path: '/vue-app/khram/photoalbums',
        name: 'khram_Photoalbums',
        component: khram_Photoalbums
    },
    {
        path: '/vue-app/khram/photoalbum/:id',
        name: 'khram_PhotoalbumItem',
        component: khram_PhotoalbumItem
    },
    {
        path: '/vue-app/khram/videoalbums',
        name: 'khram_Videoalbums',
        component: khram_Videoalbums
    },
    {
        path: '/vue-app/khram/videoalbum/:id',
        name: 'khram_VideoalbumItem',
        component: khram_VideoalbumItem
    },
    {
        path: '/vue-app/khram/news',
        name: 'khram_News',
        component: khram_News
    },
    {
        path: '/vue-app/khram/news_item/:id',
        name: 'khram_NewsItem',
        component: khram_NewsItem
    },
];