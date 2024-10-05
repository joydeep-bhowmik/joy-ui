@props(['exclusive' => false])
<div {{ $attributes->merge(['class' => 'flex flex-col gap-5']) }} x-data="{
    exclusive: @js($exclusive),
    expand($el) {
        const accordion = $el.parentNode;

        const allEls = $refs.parent.querySelectorAll('.accordion-item');
        if (this.exclusive) {
            allEls.forEach((el) => {
                if (el.isSameNode(accordion)) return;

                el.querySelector('.accordion-item-content').style.display = 'none'
            });
        }
        accordion.querySelector('.accordion-svg').classList.toggle('rotate-180');
        accordion.querySelector('.accordion-item-content').style.display = accordion.querySelector('.accordion-item-content').style.display == 'none' ? 'block' : 'none'
    },
}" x-ref="parent">

    <div class='mt-3 flex flex-col gap-5'>
        {{ $slot }}
    </div>
</div>
