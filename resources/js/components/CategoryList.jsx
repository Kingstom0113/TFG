import React, { useState, useEffect } from 'react';
import CategoryItem from './CategoryItem';

const CategoryList = () => {
    const [categories, setCategories] = useState([]);

    useEffect(() => {
        const fetchCategories = async () => {
            const response = await fetch('/api/categories');
            if (response.ok) {
                const data = await response.json();
                setCategories(data);
            } else {
                alert("No se pudieron cargar las categorías");
            }
        };

        fetchCategories();
    }, []);

    return (
        <div className="category-list">
            {categories.map(category => (
                <CategoryItem key={category.id} category={category} />
            ))}
        </div>
    );
};

export default CategoryList;
