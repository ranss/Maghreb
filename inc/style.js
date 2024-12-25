document.addEventListener('DOMContentLoaded', () => {
    const widgets = document.querySelectorAll('.review-widget');
    const container = document.querySelector('.review-widget-area');
    let draggedWidget = null;

    widgets.forEach((widget) => {
        widget.addEventListener('dragstart', (e) => {
            draggedWidget = widget;
            widget.style.opacity = '0.5'; // Make dragged widget semi-transparent
        });

        widget.addEventListener('dragend', (e) => {
            widget.style.opacity = '1'; // Reset opacity
            draggedWidget = null;
        });
    });

    container.addEventListener('dragover', (e) => {
        e.preventDefault(); // Allow drop
        const afterElement = getDragAfterElement(container, e.clientX);
        if (afterElement == null) {
            container.appendChild(draggedWidget);
        } else {
            container.insertBefore(draggedWidget, afterElement);
        }
    });

    function getDragAfterElement(container, x) {
        const draggableElements = [...container.querySelectorAll('.review-widget:not(.dragging)')];
        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = x - box.left - box.width / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
    }
});