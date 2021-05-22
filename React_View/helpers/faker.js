import faker from 'faker';

export const getNameDobs = (max = 50) => {
  let _data = [];

  for (let i = 0; i < max; i++) {
    _data.push({
      firstName: faker.name.firstName(),
      lastName: faker.name.lastName(),
      name: faker.name.findName(),
      dob: faker.date.past(),
    });
  }

  return _data;
};
