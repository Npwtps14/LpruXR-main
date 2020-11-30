db.collection('project').get().then((snapshot) => {
    console.log(snapshot.docs);
})