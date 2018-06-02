import { GraphQLServer } from 'graphql-yoga';
import { Prisma } from './generated/prisma';
import { Request } from 'express';

const resolvers = {};

const server = new GraphQLServer({
  typeDefs: './src/schema.graphql',
  resolvers,
  context: (req: Request) => ({
    ...req,
    db: new Prisma({
      endpoint: process.env.PRISMA_ENDPOINT,
      debug: true,
    }),
  }),
});