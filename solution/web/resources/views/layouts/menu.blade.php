<div class="Sidebar flex_col x_sb">
    <div class="Nav">
        <a href="/" aria-current="page" class="Nav_item {{ request()->is(['/', 'profile']) ?'nuxt-link-exact-active nuxt-link-active':'' }} i_1">Профиль</a>
        <a href="/orders" class="Nav_item i_2 {{ request()->is('orders') ?'nuxt-link-exact-active nuxt-link-active':'' }}">Мои заказы</a>
    </div>
    <a href="/logout" class="Nav_item i_4">Выход</a>
</div>
