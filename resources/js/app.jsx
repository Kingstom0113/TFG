import * as bootstrap from 'bootstrap';

import React from "react";
import ReactDOM from "react-dom";
import PlatoCreator from './components/PlatoCreator';


if (document.getElementById('react-root')) {
    const root = ReactDOM.createRoot(document.getElementById('react-root'));
    root.render(<PlatoCreator />);
}