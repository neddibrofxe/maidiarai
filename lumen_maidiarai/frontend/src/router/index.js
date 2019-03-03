import Vue from 'vue'
import Router from 'vue-router'
import Diary from '@/components/Diary'
import FormDiary from '@/components/FormDiary'

Vue.use(Router)

export default new Router ({
	routes: [
	{
		path: '/diary',
		name: 'Diary',
		component: Diary
	},
	{
		path: '/diary/create',
		name: 'DiaryCreate',
		component: FormDiary
	},
	{
		path: '/diary/:id',
		name: 'DiaryEdit',
		component: FormDiary
	}
	]
})