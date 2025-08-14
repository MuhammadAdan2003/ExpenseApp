class Toastr {
    constructor() {
        // Check if container already exists
        let container = document.querySelector('.toastr-container');
        if (!container) {
            container = document.createElement('div');
            container.className = 'toastr-container';
            document.body.appendChild(container);
        }
        this.container = container;
    }

    show(options) {
        const toast = document.createElement('div');
        toast.className = `toastr toastr-${options.type}`;

        toast.innerHTML = `
            <div class="toastr-icon">
                ${this.getIcon(options.type)}
            </div>
            <div class="toastr-content">
                <div class="toastr-title">${options.title}</div>
                <div class="toastr-message">${options.message}</div>
            </div>
            <button class="toastr-close">&times;</button>
            <div class="toastr-progress">
                <div class="toastr-progress-bar" style="animation-duration: ${options.duration}ms"></div>
            </div>
        `;

        const closeBtn = toast.querySelector('.toastr-close');
        closeBtn.addEventListener('click', () => this.hideToast(toast));

        this.container.appendChild(toast);

        // Force reflow to enable animation
        void toast.offsetWidth;

        // Trigger the show animation
        toast.classList.add('show');

        // Auto-hide if duration is set
        if (options.duration) {
            setTimeout(() => this.hideToast(toast), options.duration);
        }
    }

    hideToast(toast) {
        toast.classList.remove('show');
        toast.classList.add('hide');
        toast.addEventListener('transitionend', () => {
            toast.remove();
        });
    }

    getIcon(type) {
        const icons = {
            success: '<i class="fas fa-check-circle"></i>',
            error: '<i class="fas fa-exclamation-circle"></i>',
            warning: '<i class="fas fa-exclamation-triangle"></i>',
            info: '<i class="fas fa-info-circle"></i>'
        };
        return icons[type] || icons.info;
    }

    success(title, message, duration = 5000) {
        this.show({ type: 'success', title, message, duration });
    }

    error(title, message, duration = 5000) {
        this.show({ type: 'error', title, message, duration });
    }

    warning(title, message, duration = 5000) {
        this.show({ type: 'warning', title, message, duration });
    }

    info(title, message, duration = 5000) {
        this.show({ type: 'info', title, message, duration });
    }
}

// Make it globally available
window.toastr = new Toastr();
