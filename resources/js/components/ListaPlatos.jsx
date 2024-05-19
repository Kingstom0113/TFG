import React, { useState, useEffect } from 'react';
import Plato from './Plato';

const ListaPlatos = () => {
    const [platos, setPlatos] = useState([]);

    useEffect(() => {
        // Fetch platos from the API
        const fetchPlatos = async () => {
            const response = await fetch('/api/platos');
            const data = await response.json();
            setPlatos(data);
        };

        fetchPlatos();
    }, []);

    return (
        <div className="lista-platos">
            {platos.map(plato => (
                <Plato key={plato.id} plato={plato} />
            ))}
        </div>
    );
};

export default ListaPlatos;


