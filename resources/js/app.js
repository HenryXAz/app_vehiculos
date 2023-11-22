import userCardSidebar from './alpine-components/user-card-sidebar';
import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine

Alpine.data('user_card_sidebar', userCardSidebar)

Alpine.start()