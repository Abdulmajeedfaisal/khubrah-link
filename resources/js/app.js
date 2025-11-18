import './bootstrap';
import 'animate.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// حل مشكلة النقر المزدوج على الروابط
document.addEventListener('DOMContentLoaded', function() {
    // منع النقر المزدوج على جميع الروابط
    let clickTimeout = null;
    
    document.addEventListener('click', function(e) {
        const link = e.target.closest('a');
        if (link && link.href && !link.hasAttribute('data-no-prevent')) {
            // إذا كان هناك نقرة سابقة قريبة، امنع هذه النقرة
            if (clickTimeout) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
            
            // تعيين timeout لمنع النقرات المتعددة
            clickTimeout = setTimeout(() => {
                clickTimeout = null;
            }, 500);
        }
    }, true);
});
