import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

if (window.Chart) {
    window.Chart.defaults.font.family = '"Plus Jakarta Sans", ui-sans-serif, system-ui, sans-serif';
    window.Chart.defaults.color = '#475569';
    window.Chart.defaults.borderColor = 'rgba(148, 163, 184, 0.18)';
    window.Chart.defaults.plugins.legend.labels.boxWidth = 12;
    window.Chart.defaults.plugins.legend.labels.boxHeight = 12;
    window.Chart.defaults.plugins.tooltip.backgroundColor = '#0f172a';
    window.Chart.defaults.plugins.tooltip.titleColor = '#f8fafc';
    window.Chart.defaults.plugins.tooltip.bodyColor = '#e2e8f0';
    window.Chart.defaults.plugins.tooltip.padding = 12;
}

Alpine.start();
