import './bootstrap';
import './scrip1t';
import React from 'react';
import { createRoot } from 'react-dom/client';
import Payment from './Pages/Payment';

// Fonction pour rendre le composant de paiement
window.renderPaymentComponent = (element) => {
    const root = createRoot(element);
    root.render(<Payment />);
};




