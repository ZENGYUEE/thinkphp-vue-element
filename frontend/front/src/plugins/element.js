import Vue from 'vue'
import { Container, Header, Aside, Main, Button, Form, FormItem, Input, Message, Menu, MenuItem, MenuItemGroup, Submenu, Dropdown, DropdownMenu, DropdownItem, Breadcrumb, BreadcrumbItem, Table, TableColumn, Card, Pagination, Dialog, Radio, MessageBox } from 'element-ui'


Vue.use(Container)
Vue.use(Header)
Vue.use(Aside)
Vue.use(Main)
Vue.use(Button)
Vue.use(Form)
Vue.use(FormItem)
Vue.use(Input)
Vue.use(Menu)
Vue.use(MenuItem)
Vue.use(MenuItemGroup)
Vue.use(Submenu)
Vue.use(Dropdown)
Vue.use(DropdownMenu)
Vue.use(DropdownItem)
Vue.use(Breadcrumb)
Vue.use(BreadcrumbItem)
Vue.use(Table)
Vue.use(TableColumn)
Vue.use(Card)
Vue.use(Pagination)
Vue.use(Dialog)
Vue.use(Radio)

Vue.prototype.$message = Message
Vue.prototype.$confirm = MessageBox.confirm
Vue.prototype.$alert = MessageBox.alert
Vue.prototype.$prompt = MessageBox.prompt
