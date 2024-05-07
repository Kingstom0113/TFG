import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import Select from 'react-select';

const PlatoCreator = () => {
    const { cartaId} = useParams();
    const [plato, setPlato] = useState({
        nombre: '',
        descripcion: '',
        precio: '',
        carta_id: '',  // Será establecido automáticamente
        producto_ids: []
    });
    const [productos, setProductos] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            const resProductos = await fetch('/api/productos');
            const data = await resProductos.json();
            setProductos(data.map(producto => ({
                value: producto.id,
                label: producto.nombre
            })));
        };

        fetchData();
    }, []);

    const handleChange = selectedOptions => {
        setPlato({ ...plato, producto_ids: selectedOptions.map(option => option.value) });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        const response = await fetch('/api/platos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(plato),
            carta_id: cartaId
        });

        if (response.ok) {
            console.log('Plato creado!');
            setPlato({
                nombre: '',
                descripcion: '',
                precio: '',
                carta_id: carta_id, // Mantener el ID de la carta
                producto_ids: [] // Reiniciar producto_ids
            });
        } else {
            console.log('Error al crear el plato');
        }
    };

    return (
        <form onSubmit={handleSubmit} className="form-container">
            <div style={{ display: 'flex', flexDirection: 'row', justifyContent: 'space-between', gap: '2rem', alignItems:'center' }}>
                <div style={{ display: 'flex', flexDirection: 'column', gap: '10px' }}>
                    <label htmlFor="nombre">Nombre del plato:</label>
                    <input type="text" id="nombre" name="nombre" value={plato.nombre} onChange={(e) => setPlato({...plato, nombre: e.target.value})} placeholder="Nombre del plato" required />
                    <label htmlFor="descripcion">Descripción del plato:</label>
                    <textarea id="descripcion" name="descripcion" value={plato.descripcion} onChange={(e) => setPlato({...plato, descripcion: e.target.value})} placeholder="Descripción del plato" required></textarea>
                </div>
                <div style={{ display: 'flex', flexDirection: 'column', gap: '10px' }}>
                    <label htmlFor="precio">Precio:</label>
                    <input type="text" id="precio" name="precio" value={plato.precio} onChange={(e) => setPlato({...plato, precio: e.target.value})} placeholder="Precio" required />
                    <label htmlFor="producto_ids">Productos:</label>
                    <Select
                        isMulti
                        name="producto_ids"
                        options={productos}
                        className="basic-multi-select"
                        classNamePrefix="select"
                        onChange={handleChange}
                        value={productos.filter(option => plato.producto_ids.includes(option.value))}
                    />
                </div>
            </div>
            <button type="submit">Crear Plato</button>
        </form>
    );
};

export default PlatoCreator;
