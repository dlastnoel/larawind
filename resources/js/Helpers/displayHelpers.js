const displayName = (model, isLastNameFirst = false, showFull = true) => {
    if(model.firstname) {
        let lastname = model.lastname
        let firstname = model.firstname
        let middlename = 0
    
        lastname = model.suffix ? `${lastname} ${model.suffix}` : `${lastname}`
    
        if(model.middlename && model.middlename !== '') {
        middlename = model.middlename
    }
    
    if(showFull) {
    
        if(isLastNameFirst) {
            return middlename ? `${lastname}, ${firstname} ${middlename}` : `${lastname}, ${firstname}`
        }
    
        return middlename ? `${firstname} ${middlename} ${lastname}` : `${firstname} ${lastname}`
    }
    
    if(isLastNameFirst) {
        return middlename ? `${lastname}, ${firstname} ${middlename}[0].` : `${lastname}, ${firstname}`
    }
    
        return middlename ? `${firstname} ${middlename}[0]. ${lastname}` : `${firstname} ${lastname}`
    }
    
    return ''
}

export {
    displayName
}