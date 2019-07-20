import Vue from 'vue'
import  VueRouter from 'vue-router'
import home from '../components/home'
import create from '../components/Create'
import  edit from  '../components/Edit'
import  map from  '../components/map'
import  user from  '../components/ExampleComponent'
import  viewData from '../components/viweData'






Vue.use(VueRouter)
const  router = new VueRouter ({
    routes : [
        {
            path : '/',
            name : "home",
            component :home
        },
        {
            path : '/create',
            name : "create",
            component :create
        },
        {
            path : '/edit/:id',
            name : "edit",
            component :edit
        },
        {
            path : '/map',
            name : "map",
            component :map
        },
        {
            path : '/user',
            name : "user",
            component :user
        },
        {
            path : '/viewData/:uid',
            name : "viewData",
            component :viewData
        },


    ]
})

export default router