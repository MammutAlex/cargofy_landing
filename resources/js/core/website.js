export function carrierApp(url) {
    return setUrl(import.meta.env.VITE_CARRIER_APP || 'https://app.cargofy.com', url);
}

export function shipperLanding(url) {
    return setUrl(import.meta.env.VITE_SHIPPER_LANDING || 'https://fr8lines.com', url);
}

function setUrl(domain, url) {
    return `${domain}/${(url||'').trim().replace(/^\/+|\/+$/g, '')}`;
}
