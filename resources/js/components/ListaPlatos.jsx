import React, { useState, useEffect } from 'react';
import Plato from './Plato';

const ListaPlatos = ({ platosInicial }) => {
    const [platos, setPlatos] = useState(platosInicial || []);

    return (
        <div className="lista-platos">
            {platos.map(plato => (
                <Plato key={plato.id} plato={plato} />
            ))}
        </div>
    );
};

export default ListaPlatos;

