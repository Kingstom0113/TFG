import React from 'react';
import { useDrop } from 'react-dnd';

const DroppableComponent = ({ onDrop, children }) => {
    const [{ canDrop, isOver }, drop] = useDrop(() => ({
        accept: 'BOX',
        drop: (item, monitor) => onDrop(item),
        collect: (monitor) => ({
            isOver: !!monitor.isOver(),
            canDrop: !!monitor.canDrop(),
        }),
    }));

    return (
        <div ref={drop} style={{ backgroundColor: canDrop ? 'rgba(0, 255, 0, .2)' : 'rgba(255, 0, 0, .2)' }}>
            {isOver ? 'Release to drop' : 'Drag a box here'}
            {children}
        </div>
    );
};

export default DroppableComponent;
