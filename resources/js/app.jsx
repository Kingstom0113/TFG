import * as bootstrap from 'bootstrap';

import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { DndProvider } from 'react-dnd';
import { HTML5Backend } from 'react-dnd-html5-backend';
import PlatoCreator from './components/PlatoCreator';
import ListaPlatos from './components/ListaPlatos';
import CategoryCreator from './components/CategoryCreator';
import CategoryList from './components/CategoryList';
import DraggableComponent from './components/DraggableComponent';
import YourComponent from './YourComponent';




function App() {
    return (
        <Router>
            <Routes>
                <Route path="/cartas/:cartaId" element={<PlatoCreator />} />
                <Route path="/categorias/crear" element={<CategoryCreator />} />
            </Routes>
        </Router>
    );
}

export default App;

// Montaje de la aplicación principal
const rootContainer = document.getElementById('react-root');
if (rootContainer) {
    const root = ReactDOM.createRoot(rootContainer);
    root.render(
        <React.StrictMode>
            <App />
        </React.StrictMode>
    );
}

// Montaje de la lista de platos
const rootList = document.getElementById('react-category-list');
if (rootList) {
    const root = ReactDOM.createRoot(rootList);
    root.render(<CategoryList />);
}

// Montaje del creador de categorías
const categoryCreatorContainer = document.getElementById('react-category-creator');
if (categoryCreatorContainer) {
    const categoryRoot = ReactDOM.createRoot(categoryCreatorContainer);
    categoryRoot.render(
        <React.StrictMode>
            <CategoryCreator />
        </React.StrictMode>
    );
}

const categoryListContainer = document.getElementById('react-category-list');
if (categoryListContainer) {
    const CategoriaInicial = JSON.parse(categoryListContainer.getAttribute('data-categorias') || '[]');
    const categoryRoot = ReactDOM.createRoot(categoryListContainer);
    categoryRoot.render(<CategoryList CategoriaInicial={CategoriaInicial} />);
}


