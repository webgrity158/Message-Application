import { registerRoutes } from './ziggy';

registerRoutes({
  'chat.newMessage': { uri: 'chat/message', methods: ['POST'] },
});
