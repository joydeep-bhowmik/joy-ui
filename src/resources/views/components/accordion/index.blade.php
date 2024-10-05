@props(['exclusive' => false, 'transition' => false])
<div {{ $attributes->merge(['class' => 'flex flex-col gap-5']) }} x-data="{
    exclusive: @js($exclusive),
    transition: @js($transition),
    expand($el) {
        const accordion = $el.parentNode;
        const allEls = $refs.parent.querySelectorAll('.accordion-item');

        if (this.exclusive) {
            allEls.forEach((el) => {
                if (el.isSameNode(accordion)) return;
                const content = el.querySelector('.accordion-item-content');

                if (this.transition) {
                    content.style.maxHeight = '0';
                    content.style.opacity = '0';
                }
                el.querySelector('.accordion-svg').classList.remove('rotate-180');
            });
        }

        const content = accordion.querySelector('.accordion-item-content');
        if (content.style.maxHeight === '0px' || !content.style.maxHeight) {
            content.style.display = 'block';
            if (this.transition) {
                content.style.maxHeight = content.scrollHeight + 'px';
                content.style.opacity = '1';
            }
        } else {
            if (this.transition) {
                content.style.maxHeight = '0';
                content.style.opacity = '0';
                setTimeout(() => content.style.display = 'none', 300);
            }
        }
        accordion.querySelector('.accordion-svg').classList.toggle('rotate-180');
    },
}" x-ref="parent">

    <div class='mt-3 flex flex-col divide-y dark:divide-slate-700'>
        {{ $slot }}
    </div>
</div>
