import React, { useState } from 'react';

const PlatoCreator = () => {
    const [plato, setPlato] = useState({ nombre: '', descripcion: '', precio: '', categoria_id: '' });

    const handleChange = (e) => {
        setPlato({ ...plato, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        const response = await fetch('/api/platos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(plato),
        });

        if (response.ok) {
            console.log('Plato creado!');
        }
    };

    return (
        <form onSubmit={handleSubmit}>
            <input type="text" name="nombre" value={plato.nombre} onChange={handleChange} placeholder="Nombre del plato" />
            <textarea name="descripcion" value={plato.descripcion} onChange={handleChange} placeholder="Descripción del plato"></textarea>
            <input type="text" name="precio" value={plato.precio} onChange={handleChange} placeholder="Precio" />
            <input type="number" name="categoria_id" value={plato.categoria_id} onChange={handleChange} placeholder="ID de la categoría" />
            <button type="submit">Crear Plato</button>
        </form>
    );
};

export default PlatoCreator;
