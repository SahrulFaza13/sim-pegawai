import './bootstrap';
import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    initializeToast();
    initializeDeleteModal();
    initializeDashboardCharts();
});

function initializeToast() {
    const toast = document.querySelector('[data-toast]');

    if (!toast) {
        return;
    }

    const closeButton = toast.querySelector('[data-toast-close]');
    const removeToast = () => toast.remove();

    closeButton?.addEventListener('click', removeToast);
    window.setTimeout(removeToast, 4000);
}

function initializeDeleteModal() {
    const modal = document.getElementById('delete-modal');
    const form = document.getElementById('delete-form');
    const employeeName = document.getElementById(
        'delete-employee-name'
    );

    if (!modal || !form || !employeeName) {
        console.error('Komponen modal hapus tidak ditemukan.');

        return;
    }

    const deleteButtons = document.querySelectorAll('.btn-delete');

    const openModal = (url, name) => {
        if (!url) {
            console.error('URL penghapusan tidak ditemukan.');

            return;
        }

        form.action = url;
        employeeName.textContent = name || 'pegawai ini';

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        document.body.classList.add('overflow-hidden');
    };

    const closeModal = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');

        form.removeAttribute('action');
        employeeName.textContent = '';

        document.body.classList.remove('overflow-hidden');
    };

    deleteButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const url = button.dataset.url;
            const name = button.dataset.name;

            console.log('URL hapus:', url);

            openModal(url, name);
        });
    });

    modal.querySelectorAll('[data-delete-close]')
        .forEach((button) => {
            button.addEventListener('click', closeModal);
        });

    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (
            event.key === 'Escape'
            && !modal.classList.contains('hidden')
        ) {
            closeModal();
        }
    });

    form.addEventListener('submit', (event) => {
        if (!form.getAttribute('action')) {
            event.preventDefault();

            console.error(
                'Form hapus tidak memiliki URL tujuan.'
            );
        }
    });
}

function initializeDashboardCharts() {
    createChart('gender-chart', 'gender-chart-data', {
        type: 'doughnut',
        datasetLabel: 'Jumlah Pegawai',
        colors: ['#2563eb', '#ec4899'],
    });

    createChart('education-chart', 'education-chart-data', {
        type: 'bar',
        datasetLabel: 'Jumlah Pegawai',
        colors: ['#4f46e5'],
    });

    createChart('age-chart', 'age-chart-data', {
        type: 'bar',
        datasetLabel: 'Jumlah Pegawai',
        colors: ['#059669'],
    });
}

function createChart(canvasId, dataId, options) {
    const canvas = document.getElementById(canvasId);
    const dataElement = document.getElementById(dataId);

    if (!canvas || !dataElement) {
        return;
    }

    const chartData = JSON.parse(dataElement.textContent);

    new Chart(canvas, {
        type: options.type,
        data: {
            labels: chartData.labels,
            datasets: [
                {
                    label: options.datasetLabel,
                    data: chartData.values,
                    backgroundColor: options.colors,
                    borderWidth: 0,
                    borderRadius: options.type === 'bar' ? 6 : 0,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: options.type === 'doughnut',
                    position: 'bottom',
                },
            },
            scales: options.type === 'bar'
                ? {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                        },
                    },
                }
                : undefined,
        },
    });
}
